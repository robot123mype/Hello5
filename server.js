const express = require('express');
const app = express();

app.get('/', async (req, res) => {
    try {
        const response = await fetch('https://api.ipify.org?format=json');
        const data = await response.json();
        res.send(data.ip);
    } catch (error) {
        res.send('Error getting IP');
    }
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});
