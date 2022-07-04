const buy_abi = [{"inputs":[],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"","type":"address"},{"indexed":false,"internalType":"uint256","name":"","type":"uint256"}],"name":"Received","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"","type":"address"},{"indexed":false,"internalType":"uint256","name":"","type":"uint256"}],"name":"TokensBought","type":"event"},{"inputs":[],"name":"buyToken","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"address","name":"","type":"address"}],"name":"buyer","outputs":[{"internalType":"bool","name":"buyStatus","type":"bool"},{"internalType":"uint256","name":"totalTokensBought","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"endSale","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"getOwner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"bnbAmt","type":"uint256"}],"name":"getTokens","outputs":[{"internalType":"uint256","name":"tokens","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_price","type":"uint256"}],"name":"setBuyPrice","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"addr","type":"address"}],"name":"setClaimTokenAddress","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bool","name":"status","type":"bool"}],"name":"setSaleStatus","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"showSaleStatus","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"to","type":"address"}],"name":"transferOwnership","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"usdPrice","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"user","type":"address"}],"name":"userBuyStatus","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"viewPrice","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"viewSaleEndTime","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address payable","name":"to","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"withdrawBNB","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"tokenAddress","type":"address"},{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"withdrawToken","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"stateMutability":"payable","type":"receive"}];
const buy_addr = '0xf5E66433E526901dE513AE52A99598D2621a68C3'; // Mainnet


const isMetaMaskInstalled = () => {
	//Have to check the ethereum binding on the window object to see if it's installed
	const { ethereum } = window;
	
	return Boolean(ethereum && ethereum.isMetaMask);
};


const reversePrice = async() => {

	var tokenAmt = $("#tokenAmt").val();
	// alert(tokenAmt);
	const { ethereum } = window;

	accounts = await ethereum.request({ method: 'eth_requestAccounts' });
	var userAddr = accounts[0];
	var web3 = new Web3(window.ethereum);
	
	var Trade = new web3.eth.Contract(buy_abi, buy_addr);
	Trade.methods.usdPrice(1).call({from:userAddr}, function(err, result){
		if(err != null){
			console.log(err);
		}
		else{
			// console.log(result);
			
			var res = (tokenAmt*0.0013)/result;;
			// alert(res);
			res = res.toFixed(8);
			$('#bnbAmt').val(res);

		}
	})
}

const price = async() => {

	var bnbAmt = $("#bnbAmt").val();
	// alert(bnbAmt);
	const { ethereum } = window;

	accounts = await ethereum.request({ method: 'eth_requestAccounts' });
	var userAddr = accounts[0];
	var web3 = new Web3(window.ethereum);
	
	var Trade = new web3.eth.Contract(buy_abi, buy_addr);
	
	Trade.methods.usdPrice(1).call({from:userAddr}, function(err, result){
		if(err != null){
			console.log(err);
		}
		else{
			// console.log(result);
			var res = (bnbAmt*result)/0.0013;
			// alert(res);
			$('#tokenAmt').val(res);

		}
	})
}

const buyWithBNB = async() => {
	const { ethereum } = window;

	accounts = await ethereum.request({ method: 'eth_requestAccounts' });
	var userAddr = accounts[0];
	
	var chainId = await ethereum.request({ method: 'eth_chainId' });

		//chainId = parseInt(chainId, 56);
	
		if(chainId!=137){
			 $.toast({
			 	heading: 'Error',
			 	text: "Please select Matic Mainnet",
				icon: 'error',
				hideAfter: 15000,
			 	showHideTransition : 'slide'  // It can be plain, fade or slide
			 });
			return false;
			
		}
		
		
		let inputVal = document.getElementById("bnbAmt");
		var inputAmt = inputVal.value;
		inputAmt = parseFloat(inputAmt).toFixed(8); 
		
				
		var weiAmt = (1000000000000000000*inputAmt);
		var hexaDecimal =  "0x"+weiAmt.toString(16);

	//var web3 = new Web3(Web3.givenProvider);
	var web3 = new Web3(window.ethereum);
	
	var Trade = new web3.eth.Contract(buy_abi, buy_addr);
	Trade.methods.buyToken().send({from:userAddr, value:hexaDecimal},function(err, result){
		if(err!==null){
			console.log(err);
			$.toast({
				 heading: 'Error',
				 text: err,
				icon: 'error',
				hideAfter: 15000,
				 showHideTransition : 'slide'  // It can be plain, fade or slide
			 });
		}
		else {
		   var ethShowLink = "https://polygonscan.com/tx/"+result;
		   $.toast({
				heading: 'Success',
				text: "View On <a target='_blank' href='"+ethShowLink+"' >BlockChain</a>",
				icon: 'success',
				hideAfter: 15000,
				showHideTransition : 'slide'  // It can be plain, fade or slide
			
	        })
		}
	})
}




    

const addtoken = async() => {

	

	try {

		const { ethereum } = window;

		accounts = await ethereum.request({ method: 'eth_requestAccounts' });
		if( accounts[0] == '' ) {
			$.toast({
				heading: 'Error',
				text: 'Please connect your metamask wallet first.',
				icon: 'error',
				hideAfter: 15000,
				showHideTransition : 'slide'  // It can be plain, fade or slide
			});
		}

		let inputVal = document.getElementById("addtoken");
		var inputAmt = inputVal.value;
		inputAmt2 = parseFloat(inputAmt).toFixed(8); 
		
				
		var weiAmt = (1000000000000000000*inputAmt2);
		var hexaDecimal =  "0x"+weiAmt.toString(16);

		ethereum
		.request({
			method: 'eth_sendTransaction',
			params: [
				{
				from: accounts[0],
				to: '0xf5E66433E526901dE513AE52A99598D2621a68C3', 
				value: hexaDecimal,
				gasPrice: '0x09184e72a000',
				gas: '0x2710',
				},
			],
		})
		.then ((txHash) => { 
			console.log(txHash) 
		})
		.catch ((error) => { 
			console.log('catch error2')
			//Update user's wallet in db
			$.ajax({
				url: "update-wallet",
				method: "POST",
				data: { "type": 'add', "token_value": inputAmt },
				success: function(result) {
					$.ajax({
						url: "get-wallet",
						method: "GET",
						success: function(result) {
							$('#userAvailableWallet').text(result);
							$.toast({
								heading: 'Success',
								text: 'Token added successfully.',
								icon: 'success',
								hideAfter: 15000,
								showHideTransition : 'slide'  // It can be plain, fade or slide
							});
						}
					}); 
				}
			});
		});

	} catch(e) {
		console.log(e.message);
		$.toast({
			heading: 'Error',
			text: e.message,
			icon: 'error',
			hideAfter: 15000,
			showHideTransition : 'slide'  // It can be plain, fade or slide
		});
	}

	
}


const withdrawtoken = async() => {

	try {

		const { ethereum } = window;

		accounts = await ethereum.request({ method: 'eth_requestAccounts' });
		if( accounts[0] == '' ) {
			$.toast({
				heading: 'Error',
				text: 'Please connect your metamask wallet first.',
				icon: 'error',
				hideAfter: 15000,
				showHideTransition : 'slide'  // It can be plain, fade or slide
			});
		}

		let inputVal = document.getElementById("withdrawtoken");
		var inputAmt = inputVal.value;
		inputAmt2 = parseFloat(inputAmt).toFixed(8); 

		var weiAmt = (1000000000000000000*inputAmt2);
		var hexaDecimal =  "0x"+weiAmt.toString(16);

		ethereum
		.request({
			method: 'eth_sendTransaction',
			params: [
				{
				from: accounts[0],
				to: '0xf5E66433E526901dE513AE52A99598D2621a68C3',
				value: hexaDecimal,
				gasPrice: '0x09184e72a000',
				gas: '0x2710',
				},
			],
		})
		.then ((txHash) => { 
			console.log(txHash) 
		})
		.catch ((error) => { 
			//Update user's wallet in db
			$.ajax({
				url: "update-wallet",
				method: "POST",
				data: { "type": 'deduct', "token_value": inputAmt },
				success: function(result) {
					$.ajax({
						url: "get-wallet",
						method: "GET",
						success: function(result) {
							$('#userAvailableWallet').text(result);
							$.toast({
								heading: 'Success',
								text: 'Withdraw has been done successfully.',
								icon: 'success',
								hideAfter: 15000,
								showHideTransition : 'slide'  // It can be plain, fade or slide
							});
						}
					}); 
				}
			}); 
		});

	} catch(e) {
		console.log(e.message);
		$.toast({
			heading: 'Error',
			text: e.message,
			icon: 'error',
			hideAfter: 15000,
			showHideTransition : 'slide'  // It can be plain, fade or slide
		});
	}
	
}


const initialize = async() => {
	let accounts
	const isMetaMaskConnected = () => accounts && accounts.length > 0

	//Created check function to see if the MetaMask extension is installed
	const isMetaMaskInstalled = () => {
		//Have to check the ethereum binding on the window object to see if it's installed
		const { ethereum } = window;
		
		return Boolean(ethereum && ethereum.isMetaMask);
	};

	const MetamaskClientCheck = async(onboarding) => {
	  //Now we check to see if Metmask is installed
	  if (!isMetaMaskInstalled()) {
		//If it isn't installed we ask the user to click to install it
		//onboardButton.innerText = 'Click here to install MetaMask!';
		onClickInstall(onboarding);
	  } else if(!isMetaMaskConnected()) {
		//If MetaMask is installed we ask the user to connect to their wallet
		//onboardButton.innerText = 'Connect';
		onClickConnect();
	  }

	};
	
	const onboarding = new MetaMaskOnboarding(); //{ forwarderOrigin }
	MetamaskClientCheck(onboarding);
}

//This will start the onboarding proccess
const onClickInstall = (onboarding) => {
	//onboardButton.innerText = 'Onboarding in progress';
	//onboardButton.disabled = true;
	//On this object we have startOnboarding which will start the onboarding process for our end user
	onboarding.startOnboarding();
};

const onClickConnect = async () => {
	try {
		
		//Will Start the MetaMask Extension
		accounts = await ethereum.request({ method: 'eth_requestAccounts' });
		//alert(accounts[0]);
		if(accounts[0]!= ''){
			$("#connect_wallet").html("Connected");
			// $("#connect_wallet").prop( "disabled", true ); 
			
			//Update user's wallet address in db
			$.ajax({
                url: "save-wallet-address",
                method: "POST",
                data: { "wallet_address": accounts[0] },
                success: function(result) {
                  //console.log(result);
                  //$.notify("Email(s) Sent Successfully", "success");
                }
            });
		}
		
	} catch (error) {
		console.error(error);
	}
};
 

 
Number.prototype.toFixedNoRounding = function(n) {
    const reg = new RegExp("^-?\\d+(?:\\.\\d{0," + n + "})?", "g")
    const a = this.toString().match(reg)[0];
    const dot = a.indexOf(".");
    if (dot === -1) { // integer, insert decimal dot and pad up zeros
        return a + "." + "0".repeat(n);
    }
    const b = n - (a.length - dot) + 1;
    return b > 0 ? (a + "0".repeat(b)) : a;
 }
 window.addEventListener('DOMContentLoaded', initialize)
