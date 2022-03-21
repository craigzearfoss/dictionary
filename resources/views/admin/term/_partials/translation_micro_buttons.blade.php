<button
    type="button"
    class="get-translation-btn btn-micro mr-1"
    data-language="{{ $language }}"
    style="width: 1rem;"
    title="Fill / Validate translation"
>F</button>

<a
    class="btn-micro btn-google ml-0 mr-1"
    target="_blank"
    href="https://translate.google.com/?sl=en&tl={{ $language }}&text={{ $term }}&op=translate"
    style="width: 1rem;"
    title="Open in Google Translate"
>G</a>

<button
    type="button"
    class="open-dictionary btn-micro btn-dictionarydotcom ml-0"
    data-language="{{ $language }}"
    style="width: 1rem;" title="Open in dictionary.com"
>D</button>
