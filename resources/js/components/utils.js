// utils to delay promise
function wait(ms) {
    return (x) => {
        return new Promise(resolve => setTimeout(() => resolve(x), ms));
    };
}

function restService(){
    console.log('Rest Service');
}

export { wait, restService }
