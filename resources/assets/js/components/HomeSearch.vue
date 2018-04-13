<template>
    <div>

    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                appId: window.Laravents.algoliaAppId,
                searchOnlyKey: window.Laravents.algoliaSearchOnlyKey
            }
        },

        mounted() {
            this.setupSearch();
        },

        methods: {
            setupSearch: function() {
                var client = algoliasearch('HDJY3LZL6A', '0d730da86389836ed2e52ea5decad2d9');
                var index = client.initIndex('meetups');
                autocomplete('#search-input', { hint: false }, [
                    {
                        source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
                        displayKey: 'my_attribute',
                        templates: {
                            suggestion: function(suggestion) {
                                return suggestion._highlightResult.my_attribute.value;
                            }
                        }
                    }
                ]).on('autocomplete:selected', function(event, suggestion, dataset) {
                    console.log(suggestion, dataset);
                });
            },

            truncate: function(str, length, ending) {
                if (length == null) {
                    length = 100;
                }

                if (ending == null) {
                    ending = '...';
                }

                if (str.length > length) {
                    return str.substring(0, length - ending.length) + ending;
                } else {
                    return str;
                }
            }
        }
    }
</script>

<style scoped>
    .algolia-autocomplete {
        width: 100%;
    }

    .algolia-autocomplete .aa-input, .algolia-autocomplete .aa-hint {
        width: 100%;
    }

    .algolia-autocomplete .aa-hint {
        color: #999;
    }

    .algolia-autocomplete .aa-dropdown-menu {
        width: 100%;
        background-color: #fff;
        border: 1px solid #999;
        border-top: none;
    }

    .algolia-autocomplete .aa-dropdown-menu .aa-suggestion {
        cursor: pointer;
        padding: 5px 4px;
    }

    .algolia-autocomplete .aa-dropdown-menu .aa-suggestion.aa-cursor {
        background-color: #B2D7FF;
    }

    .algolia-autocomplete .aa-dropdown-menu .aa-suggestion em {
        font-weight: bold;
        font-style: normal;
    }
</style>