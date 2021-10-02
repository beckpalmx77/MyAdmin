function isEmpty(obj) {
    for (let i of Object.keys(obj) ) {
        return true;
    }
    return false;
}

/* How to Use
let object = {}
object.name = '';
console.log(isEmpty(object));
*/
