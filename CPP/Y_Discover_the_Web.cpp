#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

int Case;
void solve(){
    int back = 0, mx = 1;
    stack<string> b,f;
    cout << "Case " << ++Case << ":" << endl;
    string home = "http://www.lightoj.com/";
    while(true){
        string str;
        cin >> str;
        if(str == "QUIT") break;
        else if(str == "VISIT"){
            cin >> str;
            cout << str << endl;
            b.push(str);
            while(!f.empty())
            {
                f.pop();
            }
            back++;
        }else if("BACK" == str){
            if(back == 0) 
            {
                cout << "Ignored" << endl;
                continue;
            }else if(back == 1)
            {
                cout << home << endl;
                f.push(b.top());
                b.pop();
                back--;
                continue;
            }else
            {
                f.push(b.top());
                b.pop();
                cout << b.top() << endl;
                back--;
            }
        }else if("FORWARD" == str)
        {
            if(!f.empty())
            {
                // cout << f.size() << endl;
                cout << f.top() << endl;
                b.push(f.top());
                back++;
                f.pop();
            }else cout << "Ignored" << endl;
        }
    }
}

int main()
{
      //        Bismillah
    w(t)
    
}

// lightoj -> uva -> top

// back -> light
// forward -> 