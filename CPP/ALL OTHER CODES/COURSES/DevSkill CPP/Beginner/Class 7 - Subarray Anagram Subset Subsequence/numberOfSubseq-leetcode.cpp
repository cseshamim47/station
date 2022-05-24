#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{}
int numMatchingSubseq(string s, vector<string>& words) {
    vector<vector<int>> v;
    v.resize(27,vector<int>());
    int sz = s.size();
    for(int i = 0; i < sz; i++)
    {
        v[s[i]-'a'].push_back(i);
    }
    int cnt = 0;
    for(int i = 0; i < words.size(); i++)
    {
        int pos = -1;
        bool subSeq = true;
        for(int j = 0; j < words[i].size(); j++)
        {
            int ch = words[i][j]-'a';
            auto curPos = lower_bound(v[ch].begin(),v[ch].end(),pos);
            
            
            if(curPos == v[ch].end())
            {
                subSeq = false;
                break;
            }else
            {
                if(*curPos < pos)
                {
                    subSeq = false;
                    break;
                }
                pos = *curPos+1;
            }            
        }
        if(subSeq) cnt++;
    }
    return cnt;
}
 
int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    // solve();
    vector<string> s{"a","bdb","ccd","adb","s"};
    // vector<string> s{"ccd"};
    // cout << s[1] << endl;
    cout << numMatchingSubseq("abacdbac", s);
}

// https://leetcode.com/problems/number-of-matching-subsequences/