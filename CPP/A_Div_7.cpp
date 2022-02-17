#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    string str;
    cin >> str;

    int sz = str.size();
    int num = stoi(str);
    if(num % 7 == 0)
    {
        cout << str << endl;
        return;
    } 
    string str1 = str;
    string str2 = str;
    for(int i = 1; i < 10; i++)
    {
        str[0] = 48+i;
        str1[1] = 48+i;
        int s1 = stoi(str);
        int s2 = stoi(str1);
        if(str.size() == 3)
        {
            str2[2] = 48+i;
            int s3 = stoi(str2);
            if(s3 % 7 == 0)
            {
                cout << s3 << endl;
                return;
            }
        }
        if(s1 % 7 == 0)
        {
            cout << s1 << endl;
            return;
        }
        if(s2 % 7 == 0)
        {
            cout << s2 << endl;
            return;
        }
        // cout << str << endl;
        // getchar();  
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}