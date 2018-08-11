MyPlugin.install = function (Vue, options) {

    Vue.prototype.test = function () {
        alert(111);
    }
};
export default MyPlugin
