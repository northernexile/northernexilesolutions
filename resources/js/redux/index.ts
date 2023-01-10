
import {configureStore} from '@reduxjs/toolkit';
import {technologySlice} from './slices/technologySlice'
import {contentSlice} from './slices/contentSlice'

const store=configureStore(
    {
        reducer:{
            technology:technologySlice.reducer,
            content:contentSlice.reducer
        }
    }
)

export type RootState = ReturnType<typeof store.getState>
export type AppDispatch =typeof store.dispatch
export default store;
