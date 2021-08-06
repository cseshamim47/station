#include <iostream>
using namespace std;

int main()
{
    long long x;
    cin >> x;
    string s = to_string(x);
    int count = 0;
    int seven = 0, four = 0;
    for(int i = 0; i <s.length(); i++)
    {
        if(s[i]=='4' || s[i]=='7'){
            if(s[i]=='7') {
                    seven++;
                }else if(s[i]=='4'){
                four++;
            }
        } 
        //else count++;
    }
    count = seven+four;
    if(count==4 || count==7){
        cout << "YES" << endl; 
    }else cout << "NO" << endl;
    
    //  cout << seven << " " << four << endl;
    // cout << x;
}