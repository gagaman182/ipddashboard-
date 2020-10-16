module.exports = {
    /*
     ** Headers of the page
     */
    buildModules: ["@nuxtjs/moment"],
    moment: {
        defaultLocale: "th",
        locales: ["th"],
    },
    head: {
        title: "Dashboard โรงพยาบาลหาดใหญ่",
        meta: [
            { charset: "utf-8" },
            { name: "viewport", content: "width=device-width, initial-scale=1" },
            {
                hid: "description",
                name: "description",
                content: "ระบบ Dashboard ข้อมูล โรงพยาบาลหาดใหญ่",
            },
        ],
        link: [
            { rel: "icon", type: "image/x-icon", href: "/favicon.ico" },
            {
                rel: "stylesheet",
                href: "https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;1,200&display=swap",
            },
        ],
    },
    modules: [
        "@nuxtjs/pwa",
        "nuxt-webfontloader", [
            "@nuxtjs/vuetify",
            {
                treeshake: true,
            },
        ],
        "@nuxtjs/axios",
    ],
    modern: true,
    axios: {
        // proxyHeaders: false
        baseURL: "http://localhost/dashboardipd/dashboard/backend/",
    },
};