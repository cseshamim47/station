#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string str;
    cin >> str;
    int sz = str.size();
    map<char, vector<int>> m;
    int hash[26] = {0};
    for(int i = 0; i < sz; i++)
    {
        m[str[i]].push_back(i);
        hash[str[i] - 'a']++;
    }
    int odd = 0;
    for(int i = 0; i < 26; i++)
    {
        if(hash[i] % 2 != 0) odd++;
    }
    // cout << odd << endl;
    if(odd > 1) 
    {
        cout << -1 << endl;
        return;
    }
    // cout << m['b'].size() << endl;
    // cout << m['c'].size() << endl;
    int ans[sz] = {0};
    int l = 0,r = sz-1;
    int mid = sz/2;
    for(int i = 0; i < 26; i++)
    {
        if(hash[i] != 0)
        {
            char ch = 'a'+i;
            for(int j = 0; j < hash[i]; j+=2)
            {
               if(hash[i] - j == 1)
               {
                   ans[mid] = m[ch][j];
                   continue;
               }
               ans[l] = m[ch][j];
               ans[r] = m[ch][j+1];
               l++;
               r--;
            }
        }
    }
    for(int i = 0; i < sz; i++)
    {
        cout << ans[i]+1 << " ";
    }
    cout << endl;
}

int32_t main()
{
      //        Bismillah
    w(t)
    
}



// abba