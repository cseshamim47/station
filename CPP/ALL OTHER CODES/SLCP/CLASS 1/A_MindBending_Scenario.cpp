#include <bits/stdc++.h>
using namespace std;

int main()
{
    freopen("bendin.txt","r",stdin);
    freopen("bendout.txt","w",stdout);
    int x1,x2,x3,x4,y1,y2,y3,y4;
    cin >> x1 >> y1 >> x2 >> y2 >> x3 >> y3 >> x4 >> y4;
    
    int A1 = (x2-x1) * (y2-y1);
    int A2 = (x4-x3) * (y4-y3);

    int left = max(x1,x3);
    int right = min(x2,x4);
    int top = min(y2,y4);
    int bottom = max(y1,y3);


    int A3 = (right-left) * (top - bottom);
    if(right < left && top < bottom) A3 = 0;
    cout << A1+A2-A3 << endl; 
}