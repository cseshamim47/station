#include <iostream> 
using namespace std;

int main()
{
    int w,c;
    cin >> w >> c;
    //int i=1;
    for(int i = 1;;i++){
        if(c<i) break;
        c -= i;
        if(i==w)
        {
            i = 0;
        }
    }
        
    cout << c; 
}