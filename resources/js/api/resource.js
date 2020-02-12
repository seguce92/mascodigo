import request from '@/utils/http';
/**
 * Simple RESTful resource class
 */
class Resource {
    constructor () {
        
    }

    get (uri, query) {
        return request({
            url: uri,
            method: 'get',
            params: query,
        });
    }

    post (uri, resource) {
        return request({
            url: uri,
            method: 'post',
            data: resource,
        });
    }

    put (uri, resource) {
        return request({
            url: uri,
            method: 'put',
            data: resource,
        });
    }

    delete (uri, id) {
        return request({
            url: uri + '/' + id,
            method: 'delete',
        });
    }
}

export { Resource as default };
