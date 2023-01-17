
import {configureStore} from '@reduxjs/toolkit';
import {technologySlice} from './slices/technologySlice'
import {contentSlice} from './slices/contentSlice'
import {pageSlice} from './slices/pageSlice'
import {sectorSlice} from './slices/sectorSlice'
import {companySlice} from './slices/companySlice'
import {tagCloudSlice} from "./slices/tagCloudSlice";

const store=configureStore(
    {
        reducer:{
            technology:technologySlice.reducer,
            content:contentSlice.reducer,
            pages:pageSlice.reducer,
            sectors:sectorSlice.reducer,
            company:companySlice.reducer,
            cloud:tagCloudSlice.reducer
        }
    }
)

export type RootState = ReturnType<typeof store.getState>
export type AppDispatch =typeof store.dispatch
export default store;
