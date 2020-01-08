<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="primary">
      <b-navbar-brand to="/">Vrienden Koerier</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav variant="light">
          <b-nav-item to="packages">Pakketten</b-nav-item>
          <b-nav-item to="check">Aanmaken</b-nav-item>
          <b-nav-item to="profile">Profiel</b-nav-item>
        </b-navbar-nav>
        <b-navbar-nav class="ml-auto">
          <!-- <b-nav-form>
            <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
            <b-button
              size="sm"
              class="my-2 my-sm-0"
              name="search"
              v-model="search"
              type="submit"
            >Search</b-button>
          </b-nav-form>-->

          <b-nav-item-dropdown right>
            <template v-slot:button-content>
              <em>User</em>
            </template>
            <b-dropdown-item href="#">Profiel</b-dropdown-item>
            <b-dropdown-item href="#">Uitloggen</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>
