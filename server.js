const express = require("express");
const app = express();
const SERVER_PORT = process.env.PORT || 3000;

//general
app.get("/", (req,res) => {
    res.send("Server is ready to query from recordsdb!");
});

//user login


//songs


//playlist


app.listen(SERVER_PORT, () => console.log("Example app listening on port 3000"))



