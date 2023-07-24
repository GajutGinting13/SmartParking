let loading = document.getElementById('app');

preloading = () => {
    setInterval(() => {
        if (!loading.style.opacity){
            loading.style.opacity = 1;
        }
        if (loading.style.opacity > 0){
            loading.style.opacity -= 0.05000;
        }else {
            clearInterval(loading)
            loading.style.display = 'none';
        }
    }, 1)
}
