// urlParams is null when used for embedding
window.urlParams = window.urlParams || {};

// isLocalStorage controls access to local storage
window.isLocalStorage = window.isLocalStorage || false;

// Checks for SVG support
window.isSvgBrowser = window.isSvgBrowser || (navigator.userAgent.indexOf('MSIE') < 0 || document.documentMode >= 9);

// CUSTOM_PARAMETERS - URLs for save and export
window.EXPORT_URL = window.EXPORT_URL || 'https://exp.draw.io/ImageExport4/export';
window.SAVE_URL = window.SAVE_URL || 'save';
window.OPEN_URL = window.OPEN_URL || 'open';
window.PROXY_URL = window.PROXY_URL || 'proxy';

// Paths and files
window.SHAPES_PATH = window.SHAPES_PATH || 'shapes';
// Path for images inside the diagram
window.GRAPH_IMAGE_PATH = window.GRAPH_IMAGE_PATH || 'img';
window.ICONSEARCH_PATH = window.ICONSEARCH_PATH || (navigator.userAgent.indexOf('MSIE') >= 0 ||
	urlParams['dev']) ? 'iconSearch' : 'https://www.draw.io/iconSearch';
window.TEMPLATE_PATH = window.TEMPLATE_PATH || '/templates';

// Directory for i18 files and basename for main i18n file
window.RESOURCES_PATH = window.RESOURCES_PATH || 'resources';
window.RESOURCE_BASE = window.RESOURCE_BASE || RESOURCES_PATH + '/dia';

// URL for logging
window.DRAWIO_LOG_URL = window.DRAWIO_LOG_URL || '';

// Sets the base path, the UI language via URL param and configures the
// supported languages to avoid 404s. The loading of all core language
// resources is disabled as all required resources are in grapheditor.
// properties. Note that in this example the loading of two resource
// files (the special bundle and the default bundle) is disabled to
// save a GET request. This requires that all resources be present in
// the special bundle.
window.mxLoadResources = window.mxLoadResources || false;
window.mxLanguage = window.mxLanguage || (function() 
{
	var lang = (urlParams['offline'] == '1') ? 'en' : urlParams['lang'];
	
	// Known issue: No JSON object at this point in quirks in IE8
	if (lang == null && typeof(JSON) != 'undefined')
	{
		// Cannot use mxSettings here
		if (isLocalStorage) 
		{
			try
			{
				var value = localStorage.getItem('.drawio-config');
				
				if (value != null)
				{
					lang = JSON.parse(value).language || null;
				}
			}
			catch (e)
			{
				// cookies are disabled, attempts to use local storage will cause
				// a DOM error at a minimum on Chrome
				isLocalStorage = false;
			}
		}
	}
	
	return lang;
})();

// Add new languages here. First entry is translated to [Automatic]
// in the menu defintion in Diagramly.js.
window.mxLanguageMap = window.mxLanguageMap ||
{
	'i18n': '',
	'id' : 'Bahasa Indonesia',
	'ms' : 'Bahasa Melayu',
	'bs' : 'Bosanski',
	'ca' : 'Catal??',
	'cs' : '??e??tina',
	'da' : 'Dansk',
	'de' : 'Deutsch',
	'et' : 'Eesti',
	'en' : 'English',
	'es' : 'Espa??ol',
	'fil' : 'Filipino',
	'fr' : 'Fran??ais',
	'it' : 'Italiano',
	'hu' : 'Magyar',
	'nl' : 'Nederlands',
	'no' : 'Norsk',
	'pl' : 'Polski',
	'pt-br' : 'Portugu??s (Brasil)',
	'pt' : 'Portugu??s (Portugal)',
	'ro' : 'Rom??n??',
	'fi' : 'Suomi',
	'sv' : 'Svenska',
	'vi' : 'Ti???ng Vi???t',
	'tr' : 'T??rk??e',
	'el' : '????????????????',
	'ru' : '??????????????',
	'sr' : '????????????',
	'uk' : '????????????????????',
	'he' : '??????????',
	'ar' : '??????????????',
	'th' : '?????????',
	'ko' : '?????????',
	'ja' : '?????????',
	'zh' : '??????????????????',
	'zh-tw' : '??????????????????'
};

if (typeof window.mxBasePath === 'undefined')
{
	window.mxBasePath = 'mxgraph';
}

if (window.mxLanguages == null)
{
	window.mxLanguages = [];
	
	// Populates the list of supported special language bundles
	for (var lang in mxLanguageMap)
	{
		// Empty means default (ie. browser language), "en" means English (default for unsupported languages)
		// Since "en" uses no extension this must not be added to the array of supported language bundles.
		if (lang != 'en')
		{
			window.mxLanguages.push(lang);
		}
	}
}

/**
 * Returns the global UI setting before runngin static draw.io code
 */
window.uiTheme = window.uiTheme || (function() 
{
	var ui = urlParams['ui'];
	
	// Known issue: No JSON object at this point in quirks in IE8
	if (ui == null && typeof JSON !== 'undefined')
	{
		// Cannot use mxSettings here
		if (isLocalStorage) 
		{
			try
			{
				var value = localStorage.getItem('.drawio-config');
				
				if (value != null)
				{
					ui = JSON.parse(value).ui || null;
				}
			}
			catch (e)
			{
				// cookies are disabled, attempts to use local storage will cause
				// a DOM error at a minimum on Chrome
				isLocalStorage = false;
			}
		}
	}
	
	return ui;
})();

/**
 * Global function for loading local files via servlet
 */
function setCurrentXml(data, filename)
{
	if (window.parent != null && window.parent.openFile != null)
	{
		window.parent.openFile.setData(data, filename);
	}
};

/**
 * Overrides splash URL parameter via local storage
 */
(function() 
{
	// Known issue: No JSON object at this point in quirks in IE8
	if (typeof JSON !== 'undefined')
	{
		// Cannot use mxSettings here
		if (isLocalStorage) 
		{
			try
			{
				var value = localStorage.getItem('.drawio-config');
				var showSplash = true;
				
				if (value != null)
				{
					showSplash = JSON.parse(value).showStartScreen;
				}
				
				// Undefined means true
				if (showSplash == false)
				{
					urlParams['splash'] = '0';
				}
			}
			catch (e)
			{
				// ignore
			}
		}
	}
})();

// Customizes export URL
var ex = urlParams['export'];

if (ex != null)
{
	if (ex.substring(0, 7) != 'http://' &&  ex.substring(0, 8) != 'https://')
	{
		ex = 'http://' + ex;
	}
	
	EXPORT_URL = ex;
}

// Enables offline mode
if (urlParams['offline'] == '1' || urlParams['demo'] == '1' || urlParams['stealth'] == '1' || urlParams['local'] == '1')
{
	urlParams['analytics'] = '0';
	urlParams['picker'] = '0';
	urlParams['gapi'] = '0';
	urlParams['db'] = '0';
	urlParams['od'] = '0';
	urlParams['gh'] = '0';
}

// Disables math in offline mode
if (urlParams['offline'] == '1' || urlParams['local'] == '1')
{
	urlParams['math'] = '0';
}

// Lightbox enabled chromeless mode
if (urlParams['lightbox'] == '1')
{
	urlParams['chrome'] = '0';
}

// Adds hard-coded logging domain for draw.io domains
var host = window.location.host;
var searchString = 'draw.io';
var position = host.length - searchString.length;
var lastIndex = host.lastIndexOf(searchString, position);

if (lastIndex !== -1 && lastIndex === position && host != 'test.draw.io')
{
	// endsWith polyfill
	window.DRAWIO_LOG_URL = 'https://log.draw.io';
}