const myPromise = (nb) => (
    new Promise((resolve, reject) => {
        setTimeout(() => {
            if(nb > 100) reject(`rejected for: ${nb} greater that 100`);
            resolve(`resolve to: ${nb} less than or equal to 100`);
        }, 5000);
    })   
);// return une promise

function doSomeThing(w){
    console.log(`Do something, ${w} `);  
}

function doSomeThingElse(){
    console.log("some code running synchronously");  
    console.log("some code running synchronously");  
    console.log("some code running synchronously");  

}

const nb=10;

const myFunc = (number) => {
    // asynchrone code
    myPromise(number)
        .then(res => {
            // doSomeThing is executed once the promise is resolved (or rejected).
            doSomeThing(res)
        })
        .catch(e => {
            doSomeThing(e)
        })

    
    // Synchronous code
    // doSomeThingElse is called immediately after the call to myFunc.
    doSomeThingElse();
}

myFunc(500);

// Async/Await Equivalence()
const myAsyncAwaitFunc = async(number) => {
    // asychronous Code
    try {
        let result = await myPromise(number);
        doSomeThing(result);
    }
    catch(e) {
        doSomeThing(e);
    }
}

// synchronous code
myAsyncAwaitFunc(nb);
doSomeThingElse();
