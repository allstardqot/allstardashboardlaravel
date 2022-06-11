module.exports = {
    apps: [
        {
            name: "Fixture Update Queue",
            script: "artisan",
            interpreter: "php",
            exec_mode: "fork",
            args: ["queue:work", "--daemon", "--queue=fixture"],
        },
        {
            name: "Lineup Update Queue",
            script: "artisan",
            interpreter: "php",
            exec_mode: "fork",
            args: ["queue:work", "--daemon", "--queue=lineup"],
        },
        {
            name: "Squad Update Queue",
            script: "artisan",
            interpreter: "php",
            exec_mode: "fork",
            args: ["queue:work", "--daemon", "--queue=squad"],
        },
        {
            name: "Score Update Queue",
            script: "artisan",
            interpreter: "php",
            exec_mode: "fork",
            args: ["queue:work", "--daemon", "--queue=score"],
        },
        {
            name: "Team Update Queue",
            script: "artisan",
            interpreter: "php",
            exec_mode: "fork",
            args: ["queue:work", "--daemon", "--queue=getteam"],
        }
    ],
};
