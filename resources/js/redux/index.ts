
import {configureStore} from '@reduxjs/toolkit';
import {technologySlice} from './slices/technologySlice'
import {contentSlice} from './slices/contentSlice'
import {pageSlice} from './slices/pageSlice'
import {sectorSlice} from './slices/sectorSlice'
import {companySlice} from './slices/companySlice'
import {tagCloudSlice} from "./slices/tagCloudSlice";
import {serviceSlice} from  "./slices/serviceSlice";
import authReducer from "./slices/authSlice"
import {authApi} from "./services/authService";

const store=configureStore(
    {
        reducer:{
            technology:technologySlice.reducer,
            content:contentSlice.reducer,
            pages:pageSlice.reducer,
            sectors:sectorSlice.reducer,
            company:companySlice.reducer,
            cloud:tagCloudSlice.reducer,
            services:serviceSlice.reducer,
            auth:authReducer,
            [authApi.reducerPath]:authApi.reducer
        },
        middleware: (getDefaultMiddleware) =>
            getDefaultMiddleware().concat(authApi.middleware),
    }
)

export type RootState = ReturnType<typeof store.getState>
export type AppDispatch =typeof store.dispatch
export default store;
