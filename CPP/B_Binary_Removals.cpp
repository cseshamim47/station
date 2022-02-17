#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string str;
    cin >> str;
    vector<int> zero;
    vector<int> one;
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i]=='0')zero.push_back(i);
        else one.push_back(i);
    }

    if(zero.size() <= 1 || one.size() <= 1)
    {
        cout << "YES" << endl;
        return;
    }

   set<int> st;
   bool cantDltZero = false;
   bool cantDltOne = false;
   int z = zero.size()-1;
   int o = 0;
   while(!cantDltZero || !cantDltOne)
   {
       if(z >= 0 && o < one.size())
       {
           if(zero[z] < one[o])
           {
               cout << "YES" << endl;
               return;
           }
       }

       if(o < one.size())
       {
            auto lookPrev = st.find(one[o]-1);
            auto lookNext = st.find(one[o]+1);
            if(lookPrev == st.end() && lookNext == st.end())
            {
                st.insert(one[o++]);
            }else cantDltOne = true;
       }else
       {
           cout << "YES" << endl;
           return;
       }
       if(z >= 0)
       {
            auto lookPrev = st.find(zero[z]-1);
            auto lookNext = st.find(zero[z]+1);
            if(lookPrev == st.end() && lookNext == st.end())
            {
                st.insert(zero[z--]);
            }else cantDltZero = true;
       }else
       {
           cout << "YES" << endl;
           return;
       }

       
   }
   cout << "NO" << endl;
    
}
// 1-> 2,3
// 0-> 1,4,5


int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}