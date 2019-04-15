// vars
var src, trmnl, caret, pos, speed;
trmnl = $('#terminal');
caret = $('#caret');
pos = 0;
speed = 3;

// main
$('html').on('keydown', function(e) {
  pos += speed;
  if (pos > src.length + speed - src.length % speed) {
    pos = 0;
  }
  trmnl.html(trmnl.html() + src.slice(pos - speed, pos));
  caret.removeClass('transparent');
  line.css({
    'top': caret.offset().top
  });
  window.scrollTo(0, document.body.scrollHeight);
});

// caret animation
setInterval(function() {
  caret.toggleClass('transparent');
}, 600);

// filler code
src = "\n\n/**\n\tA class for executing binary searches through an array.\n*/\npublic class BinarySearcher\n{\n\tprivate int[] a;\n\n\t/**\n\t\tConstructs a BinarySearcher.\n\t\t@param anArray a sorted array of integers\n\t*/\n\tpublic BinarySearcher(int[] anArray)\n\t{\n\t\ta = anArray;\n\t}\n\n\t/**\n\t\tFinds a value in a sorted array, using the binary\n\t\tsearch algorithm.\n\t\t@param v the value to search\n\t\t@return the index at which the value occurs, or -1\n\t\tif it does not occur in the array\n\t*/\n\tpublic int search(int v)\n\t{\n\t\tint low = 0;\n\t\tint high = a.length - 1;\n\t\twhile (low <= high)\n\t\t{\n\t\t\tint mid = (low + high) / 2;\n\t\t\tint diff = a[mid] - v;\n\n\t\t\tif (diff == 0) // a[mid] == v\n\t\t\t\treturn mid;\n\t\t\telse if (diff < 0) // a[mid] < v\n\t\t\t\tlow = mid + 1;\n\t\t\telse\n\t\t\t\thigh = mid - 1;\n\t\t}\n\t\treturn -1;\n\t}\n}\n\n";