<template>
  <div>
    <!-- Menú lateral con colapso -->
    <el-menu
      :default-active="$route.path"
      class="el-menu-vertical-demo"
      :collapse="isCollapse"
      @open="handleOpen"
      @close="handleClose"
      theme="dark"
    >
      <!-- Botón para alternar el estado del colapso -->
      <el-button @click="toggleCollapse" style="margin-bottom: 10px">
        <el-icon v-if="isCollapse"><ArrowRightBold /></el-icon>
        <el-icon v-else><ArrowLeftBold /></el-icon>
      </el-button>

      <!-- Elemento de menú para Doctores -->
      <el-menu-item :index="'/doctores'">
        <router-link to="/doctores">
          <el-icon><UserFilled /></el-icon>
          <template #title>Doctores</template>
        </router-link>
      </el-menu-item>

      <!-- Elemento de menú para Pacientes -->
      <el-menu-item :index="'/pacientes'">
        <router-link to="/pacientes">
          <el-icon><Document /></el-icon>
          <template #title>Pacientes</template>
        </router-link>
      </el-menu-item>

      <!-- Elemento de menú para Citas -->
      <el-menu-item :index="'/citas'">
        <router-link to="/citas">
          <el-icon><Setting /></el-icon>
          <template #title>Citas</template>
        </router-link>
      </el-menu-item>
    </el-menu>

    <!-- Vista de contenido -->
    <router-view />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { ArrowRightBold, ArrowLeftBold, Document, UserFilled, Setting } from '@element-plus/icons-vue'

// Estado para manejar el colapso del menú
const isCollapse = ref(true)

// Función para alternar el colapso
const toggleCollapse = () => {
  isCollapse.value = !isCollapse.value
}

// Funciones para manejar la apertura y cierre del menú (útil para debugging)
const handleOpen = (key: string, keyPath: string[]) => {
  console.log('Open:', key, keyPath)
}

const handleClose = (key: string, keyPath: string[]) => {
  console.log('Close:', key, keyPath)
}
</script>

<style scoped>
/* Estilo para el menú vertical */
.el-menu-vertical-demo {
  width: 220px;
  min-height: 100vh;
  transition: all 0.3s ease;
}

/* Opcional: estilos del menú cuando está colapsado */
.el-menu-vertical-demo.el-menu--collapse {
  width: 80px;
}

/* Estilo para los íconos y texto del menú */
.el-menu-vertical-demo .el-menu-item {
  font-size: 16px;
  color: #bbb;
}

.el-menu-vertical-demo .el-menu-item:hover {
  color: #fff;
  background-color: #1f2a3d;
}

/* Estilo para los botones dentro del menú */
.el-button {
  width: 100%;
}

/* Estilo del menú en modo oscuro */
.el-menu-vertical-demo.el-menu--dark {
  background-color: #333;
  color: #fff;
}
</style>
