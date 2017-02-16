###���ݿ����
####MySQL���ݿ⣺(����kagari_Nimingban)
#####���ݱ�����(����ǰ׺kagari_)
######user:(�û���Ϣ)
* user_id(primary key), 
* ip_address(IP��ַ), 
* user_name(��������ַ������ǰ������������ַ���), 
* block_time(����ֹʱ�䣬������������������Ǳ�����),
* last_post_id(��󷢴�id�������������ûɶ�ð�)
* last_post_time(��󷢴�ʱ�䣬�����С������С����ʱ��ʹ��)

######area:(����)
* area_id(primary key), 
* area_name(����), 
* area_sort(�����ڻ�ȡ����б��ʱ���˳��),
* block_status(����ֹ��״̬�����ظ�����������ת���һ���ӷ���), 
* parent_area(�˷����ĸ�����), 
* min_post(��С�������)

######post:(��)
* post_id(primary key), 
* area_id(������id), 
* user_id(�����û�id), 
* reply_post_id(����id�����������ĸ��������ID��û����������), 
* author_name(������), 
* author_email(����������), 
* post_title(������), 
* post_content(������), 
* post_images(ͼƬ��Ӧ���ǿ���֧�ֶ���ͼƬ��),
* create_time(�˴�����ʱ��),
* update_time(�˴�����ʱ�䣬��ͨ�ظ����£�SAGE�򲻸���)

###API����б�
>��ͬʱ����JSON��multipart/form-data(��Ϊ���ϴ�ͼƬ)

####�û�����:
* ��ȡ����    
  `/api/getCookie`    
�ύ���ݣ�
```javascript
{
	"ip": "::1"
}
```     
�������ݣ�(����)    
(��ȷip��ַ)     
```javascript
{
	"request": "getCookie",
	"response": {
		"timestamp": "2016-06-06 10:15:34",
		"ip": "::1",
		"username": "1abCDEF"
	}
}
```
(�Ƿ�ip��ַ)
```javascript
{
	"request": "getCookie",
	"response": {
		"timestamp": "2016-06-06 10:15:34",
		"error": "���IP��ַ�����Ϲ涨��"
	}
}
```
* ��ȡ����б�  
  `/api/getAreaLists`   
�ύ���ݣ�(����)  
�������ݣ�(����)    
	```javascript
	{
		"request": "getAreaList", 
		"response": {
			"timestamp": "2016-05-24 13:53:05",
			"areas": [
			{
				"area_id": 1,
				"area_name": "�ۺ�",
				"parent_area": ""
			},
			{
				"area_id": 2,
				"area_name": "�ۺϰ�1",
				"parent_area": 1
			}]
		}
	}
	```

* ��ȡ��鴮   
  `/api/getAreaPosts`  
�ύ���ݣ�    
  `area_id`    
  `area_page`    
�������ݣ�(����)(���ؽ��)  
	```javascript
	{
		"request": "getAreaPosts",
		"response": {
			"timestamp": "2016-05-27 16:26:24",
			"area_id": 2,
			"area_name": "�ۺϰ�1",
			"area_page": 1,
			"posts_per_page": 50,
			"posts": [{
				"post_id": 10000,
				"post_title": "�ޱ���",
				"post_content": "aaabbbccc",
				"post_images": "1.png",
				"user_id": 1,
				"user_name": "1wuQKIZ",
				"author_name": "������",
				"author_email": "",
				"create_time": "2016-05-27 16:37:45",
				"update_time": "2016-05-27 16:38:56",
				"reply_num": 2,
				"reply_recent_posts": [{
					"post_id": 10001,
					"user_id": 1,
					"user_name": "1wuQKIZ",
					"author_name": "������",
					"author_email": "",
					"post_title": "�ޱ���",
					"post_content": "dddeeefff",
					"post_images": "2.png,3.jpg",
					"create_time": "2016-05-27 16:38:45",
					"update_time": "2016-05-27 16:39:56",
				},
				{
					"post_id": 10002,
					"user_id": 2,
					"user_name": "1mjIUYJ",
					"author_name": "������",
					"author_email": "",
					"post_title": "�ޱ���",
					"post_content": "ggghhhiii",
					"post_images": "",
					"create_time": "2016-05-27 16:40:45",
					"update_time": "2016-05-27 16:41:56",
				}]
			},
			{
				"post_id": 10003,
				"post_title": "�ޱ���",
				"post_content": "aaabbbccc",
				"post_images": "1.png",
				"user_id": 1,
				"user_name": "1mjIUYJ",
				"author_name": "������",
				"author_email": "",
				"create_time": "2016-05-27 16:37:45",
				"update_time": "2016-05-27 16:38:56",
				"reply_num": 0,
				"reply_recent_posts": []
			}]
		}
	}
	```  
(�����û�д�)   
	```javascript
	{
		"request": "getAreaPosts",
		"response": {
			"timestamp": "getAreaPosts"
		}
	}
	```    
(����δ�ҵ����)
	```javascript
	{
		"request": "getAreaPosts",
		"response": {
			"timestamp": "2016-11-25 05:53:42",
			"area_id": 2,
			"area_name": "�ۺϰ�",
			"area_page": 1,
			"posts_per_page": 50,
			"last_reply_posts": 8,
			"posts": [],
			"info": "No posts in area with area_id=2"
		}
	}
	```
* ��ȡ������   
  `/api/getPost`   
�ύ���ݣ�  
  `post_id`   
  `post_page`    
�������ݣ�(����)(���ؽ��)     
	```javascript
	{
		"request": "getPost",
		"response": {
			"timestamp": "2016-05-27 17:06:43",
			"area_id": 2,
			"area_name": "�ۺϰ�1",
			"post_id": 10000,
			"post_page": 1,
			"posts_per_page": 50,
			"post_title": "�ޱ���",
			"post_content": "aaabbbccc",
			"post_images": "1.png",
			"user_id": 1,
			"user_name": "1wuQKIZ",
			"author_name": "������",
			"author_email": "",
			"create_time": "2016-05-27 16:37:45",
			"update_time": "2016-05-27 16:38:56",
			"reply_num": 2,
			"reply_recent_posts": [{
				"post_id": 10001,
				"user_id": 1,
				"user_name": "1wuQKIZ",
				"author_name": "������",
				"author_email": "",
				"post_title": "�ޱ���",
				"post_content": "dddeeefff",
				"post_images": "2.png,3.jpg",
				"create_time": "2016-05-27 16:38:45",
				"update_time": "2016-05-27 16:39:56",
			},
			{
				"post_id": 10002,
				"user_id": 2,
				"user_name": "1mjIUYJ",
				"author_name": "������",
				"author_email": "",
				"post_title": "�ޱ���",
				"post_content": "ggghhhiii",
				"post_images": "",
				"create_time": "2016-05-27 16:40:45",
				"update_time": "2016-05-27 16:41:56",
			}]
		}
	}
	```
(����δ�ҵ�����)
	```javascript
	{
		"request": "getPost",
		"response": {
			"timestamp": "2016-06-28 11:05:12",
			"error": "δ�ҵ���Ӧ����"
		}
	}
	```

* �����´�   
  `/api/sendPost`     
�ύ���ݣ�   
  `user_name`(�û���������)   
  `area_id`(����id������)     
  `user_ip`(�û�ip������)   
  `reply_post_id`(�ظ������´����´�Ϊ0��Ϊ����Ϊ0)        
  `author_name`   
  `author_email`   
  `post_title`   
  `post_content`(�����ݣ�����)    
  `post_image`(��data:image/gif;base64,AABBCC==��������ʽʹ��base64�����ϴ�)    
 �������ݣ�(��������)    
	```javascript
	{
		"request": "sendPost",
		"response": {
			"timestamp": "2016-06-06 10:50:45",
			"status": "OK"
		}
	}
	```
(�����ڵ�����)     
	```javascript
	{
		"request": "sendPost",
		"response": {
			"timestamp": "2016-06-29 13:17:09",
			"error": "�ظ���������"
		}
	}
	```
(���ڵ�����Ϊ�ظ�����)     
	```javascript
	{
		"request": "sendPost",
		"response": {
			"timestamp": "2016-06-29 13:21:35",
			"error": "�ظ��Ĵ���������"
		}
	}
	```

* �����°��    
`api/addArea`
�ύ���ݣ�      	
`area_name` �����     
`parent_area` Ϊĳ�����Ӱ�飬0Ϊ��    
�������ݣ�(���ӳɹ�)    
	```javascript
	{
		"request": "addArea",
		"response": {
			"timestamp": "2016-08-21 20:24:33",
			"status": "OK"
		}
	}
	```
(�����Ϊ��)
	```javascript
	{
		"request": "addArea",
		"response": {
			"timestamp": "2016-08-21 20:24:33",
			"error": "���������Ϊ��"
		}
	}
	```
(����������е�һ��)
	```javascript
	{
		"request": "addArea",
		"response": {
			"timestamp": "2016-08-21 20:24:33",
			"error": "�����abc�Ѵ�����ĸ��1֮��"
		}
	}
	```
	
* ɾ��ĳ����    
`api/deleteArea`
�ύ���ݣ�    
`area_id`(Ҫɾ��������id)    
�������ݣ�(ɾ���ɹ�)    
	```javascript
	{
		"request": "deleteArea",
		"response": {
			"timestamp": "2016-07-18 18:12:29",
			"status": "OK"
		}
		
	}
	```
(�����ڵ���)    
	```javascript
	{
		"request": "deleteArea",
		"response": {
			"timestamp": "2016-07-18 18:12:25",
			"error": "ɾ������������"
		}
	}
	```

* ɾ��ĳ����    
`/api/deletePost`    
�ύ���ݣ�    
`post_id`(ɾ���Ĵ���id)     
�������ݣ�(ɾ���ɹ�)     
	```javascript
	{
		"request": "deletePost",
		"response": {
			"timestamp": "2016-07-07 11:53:19",
			"status": "OK"
		}
		
	}
	```
(�����ڵ�����)    
	```javascript
	{
		"request": "deletePost",
		"response": {
			"timestamp": "2016-07-07 11:53:25",
			"error": "ɾ���Ĵ�������"
		}
	}
	```
