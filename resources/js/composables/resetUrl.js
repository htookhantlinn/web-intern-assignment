import mapValues from "lodash/mapValues";

let reset = (form) => {
    mapValues(form.value, (v, key) => {
        if (key !== "tab") {
            form.value[key] = null;
        } else {
            // I just want to  reload table
            form.value[key] = null;
            form.value[key] = v;
        }
    });
};
export default reset;