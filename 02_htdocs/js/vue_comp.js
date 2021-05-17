// Navigationskomponente
Vue.component("vue-nav", {
	"props": ["location"],
	"data": function() {
		return {
			"items": [
				{
					"type": "text",
					"id": "index",
					"color": "default",
					"link": "/",
					"text": "Startseite"
				},
				{
					"type": "text",
					"id": "registrierung",
					"color": "default",
					"link": "/registrierung/",
					"text": "Registrierung"
				},
				{
					"type": "text",
					"id": "login",
					"color": "default",
					"link": "/login/",
					"text": "Login"
				},
				{
					"type": "text",
					"id": "unsere-produkte",
					"color": "default",
					"link": "/unsere-produkte/",
					"text": "Unsere Produkte"
				},
				{
					"type": "text",
					"id": "gaestebuch",
					"color": "default",
					"link": "/gaestebuch/",
					"text": "Gästebuch"
				}
			]
		};
	},
	"template": '<nav class="large hidden"><ol><template v-for="item in items"><navigation-item-text v-if="item.type == \'text\'" :location="location" :id="item.id" :color="item.color" :link="item.link" :text="item.text"></navigation-item-text><navigation-item-icon v-if="item.type == \'icon\'" :location="location" :id="item.id" :color="item.color" :link="item.link" :text="item.text" :icon="item.icon"></navigation-item-icon></template></ol></nav>'
});

// Navigationselement mit reinem Text
Vue.component("navigation-item-text", {
	"props": ["location", "id", "color", "link", "text"],
	"template": '<li :class="[color, id == location ? \'selected\' : \'\']"><a :href="link">{{ text }}</a></li>'
});

// Navigationselement mit Icon
Vue.component("navigation-item-icon", {
	"props": ["location", "id", "color", "link", "text", "icon"],
	"filters": {
		"icon_path": function(resource) {
			return "/images/" + resource;
		}
	},
	"template": '<li :class="[color, id == location ? \'selected\' : \'\']"><a :href="link"><img :src="icon | icon_path" class="icon" /><span class="text">{{ text }}</span></a></li>'
});

// Footer
Vue.component("vue-footer", {
	"template": '<footer></footer>'
});