
import pageSlice from "../slices/pageSlice";
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {Page} from "../types/types"
import PageService from "../services/pageService";

export const PageActions = pageSlice.actions

export const getAllPages = ():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        if(getState().pages.pages.length == 0){
            const response:Page[] = await PageService.getAll()
            dispatch(PageActions.setPage(response))
        }
    }
}

export const getPage = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:Page = await PageService.getById(id)
        dispatch(PageActions.setActivePage(response))
    }
}
