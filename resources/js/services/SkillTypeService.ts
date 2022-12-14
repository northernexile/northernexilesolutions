
import http from "../http-common";
import ISkillTypeData from "../types/skillType";

const getAll = () => {
    return http.get<Array<ISkillTypeData>>("/skills/types");
};

const get = (id: any) => {
    return http.get<ISkillTypeData>(`/skills/types/${id}`);
};

const create = (data: ISkillTypeData) => {
    return http.post<ISkillTypeData>("/skills/types", data);
};

const update = (id: any, data: ISkillTypeData) => {
    return http.put<any>(`/skills/types/${id}`, data);
};

const remove = (id: any) => {
    return http.delete<any>(`/skills/types/${id}`);
};

const removeAll = () => {
    return http.delete<any>(`/skills/types`);
};

const SkillTypeService = {
    getAll,
    get,
    create,
    update,
    remove,
    removeAll
};

export default SkillTypeService;
