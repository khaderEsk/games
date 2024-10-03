axios.get('/api/dashboard', {
    headers: {
        'Authorization': `Bearer ${localStorage.getItem('jwt_token')}`
    }
})
.then(response => {
    console.log(response.data);
})
.catch(error => {
    console.error(error);
});