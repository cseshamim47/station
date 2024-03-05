#include <bits/stdc++.h>
using namespace std;


int f(int n)
{
    return __builtin_popcount(n)%2;
}
int main()
{
    //    Bismillah
    int t;
    cin >> t;
    while(t--)
    {
        int n;
        cin >> n;
        vector<int>v(n+1);
        for(int i = 1; i <= n; i++) cin >> v[i];
        sort(v.begin()+1, v.end(), [&](int a,int b)
        {
             if(f(a) == f(b))
             {
                return a < b;
             }else 
             {
                return f(a) == 0;
             }
        
        });
        for(int i = 1; i <= n; i++) cout << v[i] << " ";
        cout << endl;
    }
}