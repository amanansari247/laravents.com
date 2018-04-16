<template>
    <div>
        <form class="input-icon my-3 my-lg-0">
            <input type="search" class="form-control header-search" id="search-input" placeholder="Search…" tabindex="1">
            <div class="input-icon-addon">
                <i class="fe fe-search"></i>
            </div>
        </form>

        <script type="text/template" id="my-custom-menu-template">
          <div class="my-custom-menu">
            <div class="row">
              <div class="col-sm-6">
                <div class="aa-dataset-d1"></div>
              </div>
              <div class="col-sm-6">
                <div class="aa-dataset-d2"></div>
                <div class="aa-dataset-d3"></div>
              </div>
            </div>
          </div>
        </script>
    </div>
</template>

<script>
    export default {
        created() {
            this.setupSearch();
        },

        methods: {
            setupSearch: function() {
                let appId = window.Laravents.algoliaAppID;
                let searchOnlyKey = window.Laravents.algoliaSearchOnlyKey;
                var client = algoliasearch(appId, searchOnlyKey);
                $('#search-input').autocomplete({ hint: false }, [
                    {
                        templates: {
                            dropdownMenu: '#my-custom-menu-template',
                            footer: '<div class="branding">Powered by <img src="https://www.algolia.com/static_assets/images/press/downloads/algolia-logo-light.svg" /></div>'
                        }
                    },
                    [
                        {
                            source: autocomplete.sources.hits('conferences', { hitsPerPage: 5 }),
                            name: 'd1',
                            displayKey: 'title',
                            templates: {
                                header: '<h4>List 1</h4>',
                                suggestion: function(suggestion) {
                                    return suggestion._highlightResult.title.value;
                                }
                            }
                        },
                        {
                            source: autocomplete.sources.hits('meetups', { hitsPerPage: 2 }),
                            name: 'd2',
                            displayKey: 'title',
                            templates: {
                                header: '<h4>List 2</h4>',
                                suggestion: function(suggestion) {
                                    return suggestion._highlightResult.title.value;
                                }
                            }
                        },
                        {
                            source: autocomplete.sources.hits('hackathons', { hitsPerPage: 2 }),
                            name: 'd3',
                            displayKey: 'title',
                            templates: {
                                header: '<h4>List 3</h4>',
                                suggestion: function(suggestion, answer) {
                                    return suggestion._highlightResult.title.value;
                                }
                            }
                        }
                    ]
                    ]
                );
            }
        }
    }
</script>

<style scoped>

</style>