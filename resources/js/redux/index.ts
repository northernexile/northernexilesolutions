
import {configureStore} from '@reduxjs/toolkit';
import {technologySlice} from './slices/technologySlice'
import {contentSlice} from './slices/contentSlice'
import {pageSlice} from './slices/pageSlice'
import {sectorSlice} from './slices/sectorSlice'

const store=configureStore(
    {
        reducer:{
            technology:technologySlice.reducer,
            content:contentSlice.reducer,
            pages:pageSlice.reducer,
            sectors:sectorSlice.reducer
        }
    }
)

export type RootState = ReturnType<typeof store.getState>
export type AppDispatch =typeof store.dispatch
export default store;
