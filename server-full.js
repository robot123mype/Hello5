const express = require('express');
const app = express();

app.get('/', async (req, res) => {
    try {
        const ipResponse = await fetch('https://api.ipify.org?format=json');
        const ipData = await ipResponse.json();
        
        const infoResponse = await fetch(`https://ipapi.co/${ipData.ip}/json/`);
        const fullInfo = await infoResponse.json();
        
        res.json(fullInfo);
    } catch (error) {
        res.json({error: 'Failed to get IP info'});
    }
});

app.listen(3000, () => {
    console.log('IP API running on port 3000');
});
