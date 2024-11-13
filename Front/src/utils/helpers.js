export function cutString(str, length) {
   const newLength = str.length > length ? length : (str.length - 1);

   switch (str[newLength]) {
      case ',':
      case '(':
      case ')':
      case '"':
      case "'":
      case '_':
      case '-':
         return cutString(str, newLength - 1);

      case '.':
      case '!':
      case '?':
         return str.slice(0, newLength + 1); 
   }

   return str.slice(0, newLength) + '...';
};

export function areObjectsEqual(obj1, obj2) {
   const keys1 = Object.keys(obj1);
   const keys2 = Object.keys(obj2);

   if (keys1.length !== keys2.length) {
      return false;
   }

   return keys1.every(key => {
      return obj1[key] === obj2[key];
   });
};

export function scrollToTop() {
   window.scrollTo({
      top: 500,
      behavior: "smooth"
   });
};