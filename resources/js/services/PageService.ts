
import http from "../http-common";
import IPageData from "../types/page";

const getAll = () => {
    return http.get<Array<IPageData>>("/pages");
};

const get = (id: any) => {
    return http.get<IPageData>(`/pages/${id}`);
};

const create = (data: IPageData) => {
    return http.post<IPageData>("/pages", data);
};

const update = (id: any, data: IPageData) => {
    return http.put<any>(`/pages/${id}`, data);
};

const remove = (id: any) => {
    return http.delete<any>(`/pages/${id}`);
};

const removeAll = () => {
    return http.delete<any>(`/pages`);
};

const PageService = {
    getAll,
    get,
    create,
    update,
    remove,
    removeAll
};

export default PageService;
