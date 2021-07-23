import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

export default new Vuex.Store({
    plugins:[createPersistedState({
        storage: window.sessionStorage,
    })],
    state: {
        userInfo: {},
        isLogin: false,
    },
    actions: {
        setUserData(context, User)
        {
            context.commit('updateData', User)
        },
        setUserRole(context, User)
        {
            context.commit('updateRole',User)
        },
        userLogout(context)
        {
            context.commit('Logout')
        }
    },
    mutations: {
        updateData(state, User)
        {
            state.userInfo.id = User.id;
            state.userInfo.name = User.member_name;
            state.userInfo.member_type = User.member_type;
            state.isLogin = true;
        },
        updateRole(state,user)
        {

        },
        Logout(state)
        {
            state.userInfo = {};
            state.isLogin = false;
        }
    }
})
