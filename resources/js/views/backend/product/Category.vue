<template lang="">
    <div>
    	<!-- BEGIN breadcrumb -->
    	<ol class="breadcrumb float-xl-end">
    		<li class="breadcrumb-item"><a href="javascript:;">商品管理</a></li>
    		<li class="breadcrumb-item active">商品類別列表</li>
    	</ol>
    	<!-- END breadcrumb -->
    	<!-- BEGIN page-header -->
    	<h1 class="page-header">商品類別列表 <small></small></h1>
    	<!-- END page-header -->
    	<!-- BEGIN panel -->
    	<panel>
    		<panel-body>
                <div class="col-md-12" style="text-align:end;">
                  <n-button type="info" @click="showCreate()">新增類別</n-button>
                </div>
                <n-tree
                  block-line
                  draggable
                  :data="dataRef"
                  :checked-keys="checkedKeysRef"
                  :expanded-keys="expandedKeysRef"
                  :node-props="nodeProps"
                  @drop="handleDrop"
                  @update:expanded-keys="handleExpandedKeysChange"
                />
                <div class="col-md-12" style="text-align: center;">
                  <n-button type="info" @click="save()">儲存</n-button>
                </div>
    		</panel-body>
    	</panel>
    	<!-- END panel -->

        <createCategoryModal @closeModal="createModal = false" :isShow="createModal"/>
        <editCategoryModal @closeModal="editModal = false" 
          :isShow="editModal"
          :id="selectId"
          />
    </div>
</template>
<script setup>
    import { NDataTable, NButton, NPagination, NTree } from "naive-ui"
    import { ref, computed, onMounted, watch, h, reactive } from 'vue'
    import "bootstrap"
    import { useCategoryStore } from "@/stores/backend/category.js"
    import createCategoryModal from "@/views/backend/product/modal/create-category.vue"
    import editCategoryModal from "@/views/backend/product/modal/edit-category.vue"

    const categoryStore = useCategoryStore()
    const expandedKeysRef = ref([]);
    const checkedKeysRef = ref([]);
    const categoryData = computed(() => {
      return categoryStore.categoryData
    })
    const dataRef = ref(categoryData || []);
    const createModal = ref(false)
    const editModal = ref(false)
    const selectId = ref(0)
    
    onMounted(async() => {
      categoryStore.fetchCategory()
    })

    function save() {
      categoryStore.fetchEditCategory(dataRef)
    }

    function showCreate() {
      createModal.value = true
    }

    function showEdit() {
      editModal.value = true
    }

    function nodeProps({ option }) {
      return {
        ondblclick() {
          console.log("[Click] " + option.key);
          selectId.value = option.key
          showEdit()
        },
      }
    }

    function findSiblingsAndIndex(node, nodes) {
      if (!nodes)
        return [null, null];
      for (let i = 0; i < nodes.length; ++i) {
        const siblingNode = nodes[i];
        if (siblingNode.key === node.key)
          return [nodes, i];
        const [siblings, index] = findSiblingsAndIndex(node, siblingNode.children);
        if (siblings && index !== null)
          return [siblings, index];
      }
      return [null, null];
    }

    function handleExpandedKeysChange(expandedKeys) {
      expandedKeysRef.value = expandedKeys;
    }

    function handleDrop({ node, dragNode, dropPosition }) {
      console.log(node)
      console.log(dropPosition)
      //判斷可否丟到內層
      if(dropPosition === "inside") {
        if(dragNode.children === null) {
          console.log('success')
        }else if(dragNode.children.length === 0) {
          dragNode.children = null
        }else {
          console.log('return')
          return
        }
      }else {
        if(dragNode.children === null && node.children != null) {
          dragNode.children = []
        }
        if(node.children === null) {
          dragNode.children = null
        }
      }

      const [dragNodeSiblings, dragNodeIndex] = findSiblingsAndIndex(
        dragNode,
        dataRef.value
      );
      if (dragNodeSiblings === null || dragNodeIndex === null)
        return;
      dragNodeSiblings.splice(dragNodeIndex, 1);
      if (dropPosition === "inside") {
        if (node.children) {
          node.children.unshift(dragNode);
        } else {
          node.children = [dragNode];
        }
      } else if (dropPosition === "before") {
        const [nodeSiblings, nodeIndex] = findSiblingsAndIndex(
          node,
          dataRef.value
        );
        if (nodeSiblings === null || nodeIndex === null)
          return;
        nodeSiblings.splice(nodeIndex, 0, dragNode);
      } else if (dropPosition === "after") {
        const [nodeSiblings, nodeIndex] = findSiblingsAndIndex(
          node,
          dataRef.value
        );
        if (nodeSiblings === null || nodeIndex === null)
          return;
        nodeSiblings.splice(nodeIndex + 1, 0, dragNode);
      }
      dataRef.value = Array.from(dataRef.value);
    }

</script>
