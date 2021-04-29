$(document).ready(function () {

  // API
  $.ajax({
    type	: 'POST',
		url		: url + 'scripts/api-home-wt.script.php',
    dataType : 'json',
    data:{
      'action'      : 'all',
    },
    // async: true,
		success	: function(data) {
			if(data) {
        if(data.story){
          var html = [];

          var dataAll = data.story.categories;
          $.each(data.story.storys, function(id, story) {
            
            dataAll[id].story = story;

          });

          var currentSkin = getCurrentSkin();
          var stories = new Zuck('stories', {
            backNative: true,
            previousTap: true,
            skin: currentSkin['name'],
            autoFullScreen: currentSkin['params']['autoFullScreen'],
            avatars: currentSkin['params']['avatars'],
            paginationArrows: currentSkin['params']['paginationArrows'],
            list: currentSkin['params']['list'],
            cubeEffect: currentSkin['params']['cubeEffect'],
            localStorage: true,
            stories: [
              
            ]
          });

          $.each(dataAll, function(ids, index) {
            $.each(index.story, function(id, story) {
              stories.update({
                id: index.name,
                photo: index.img,
                name: '',
                link: index.img,
                lastUpdated: "",
                seen: false,
                items: []
              });
            });
          });

          $.each(dataAll, function(ids, index) {
            $.each(index.story, function(id, story) {
              stories.addItem(index.name, {
                id: id,
                type: story.type == 'image' ? 'photo' : 'video',
                length: story.type == 'video' ? 0 : 4,
                src: story.content,
                preview: "",
                link: story.content, 
                linkText: "",
                time: "",
                seen: false
              });
            });
          });
          
        }
      }
    }

  });

});