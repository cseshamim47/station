#include <bits/stdc++.h>
using namespace std;

struct Point{
    int x;
    int y;
};

int main()
{
    Point p = {.x = 20, .y = 10};
    // Point p = {.y = 10, .x = 20}; error
    printf("%d %d", p.x, p.y);    
}