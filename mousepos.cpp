#define WINDOWS_LEAN_AND_MEAN
#include <windows.h>
#include <iostream>
#include <stdio.h>

using namespace std;+

int main() {

POINT point;
if (GetCursorPos(&point)) {
  cout << point.x << "," << point.y << "\n";
}
    }
