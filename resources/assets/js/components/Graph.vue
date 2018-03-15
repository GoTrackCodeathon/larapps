<template>
    <div></div>
</template>

<style type="text/css" scoped>
    div {
        width: 100%;
        height: 400px;
        /*border: 1px solid lightgray;*/
    }
</style>

<script type="text/javascript">
import * as vis from 'vis';

export default {
    data() {
        return {
            vis  : null,
            nodes: null,
            edges: null,
        }
    },
    mounted() {
        this.nodes = new vis.DataSet(this.dataNodes);
        this.edges = new vis.DataSet(this.dataEdges);

        // provide the data in the vis format
        let data = { nodes: this.nodes, edges: this.edges };

        // initialize your network!
        let network = new vis.Network(this.$el, data, this.options);
    },
    props: {
        dataNodes: Array,
        dataEdges: Array,
        options: {
            type: Object,
            default() {
                return {}
            }
        }
    },
    watch: {
        dataNodes(val) {
            this.nodes.clear();
            this.nodes.add(val);
        },
        dataEdges(val) {
            this.edges.clear();
            this.edges.add(val);
        }
    }
}
</script>