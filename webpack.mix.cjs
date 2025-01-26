const mix = require("laravel-mix");

// Compile CSS
mix.postCss("resources/css/style.css", "public/css/app.css", [
    require("autoprefixer")({
        overrideBrowserslist: ["last 10 versions"], // Sesuaikan target browser jika diperlukan
        grid: true, // Untuk mendukung properti CSS Grid
    }),
]);

// Compile JS
mix.scripts(
    ["resources/js/main.js", "resources/js/jquery-3.7.1.min.js"],
    "public/js/app.js"
);

// minify
mix.minify("public/css/app.css");
mix.minify("public/js/app.js");

// Live reload
mix.browserSync("localhost:8000");
