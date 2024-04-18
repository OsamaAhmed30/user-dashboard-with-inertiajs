import { createApp, h } from 'vue'
import { createInertiaApp , Link , Head} from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    if (page.default.layout === undefined) {
      page.default.layout = page.default.layout||Layout

    }

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link",Link)
      .component("Head",Head)
      .mount(el)
  },
  title: title =>  `${title ? `${title} - My App` : 'My App'}  `,
  
  progress: {
    // The delay after which the progress bar will appear, in milliseconds...
    delay: 100,

    // The color of the progress bar...
    color: '#db4321',

    // Whether to include the default NProgress styles...
    includeCSS: true,

    // Whether the NProgress spinner will be shown...
    showSpinner: true,
  },
})