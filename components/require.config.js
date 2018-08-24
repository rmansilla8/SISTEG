var components = {
    "packages": [
        {
            "name": "jquery",
            "main": "jquery-built.js"
        },
        {
            "name": "datatables-responsive",
            "main": "datatables-responsive-built.js"
        },
        {
            "name": "footable",
            "main": "footable-built.js"
        }
    ],
    "shim": {
        "datatables-responsive": {
            "deps": [
                "jquery"
            ]
        }
    },
    "baseUrl": "components"
};
if (typeof require !== "undefined" && require.config) {
    require.config(components);
} else {
    var require = components;
}
if (typeof exports !== "undefined" && typeof module !== "undefined") {
    module.exports = components;
}