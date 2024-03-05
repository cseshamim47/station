#include <iostream>
using namespace std;

int main()
{
    int x;
    cin >> x;
    if(x%2==0){
        //cout << "working" << endl;
        for(int i = x; i>0; i--){
            cout << i << " ";
        }
    }else cout << -1 << endl;
}