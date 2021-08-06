#include <iostream>
// #include <algorithm>
using namespace std;

int main()
{
    //lcm of two number
    int a,b;
    cin >> a >> b;
    int end = a*b;
    int st = max(a,b);
    int ans = st;
    int i = st;
    while(i<=end){
        if(i%a == 0 and i%b == 0){
            ans = i;
            break;
        }
        i++;
    }
    cout << ans << endl;
}