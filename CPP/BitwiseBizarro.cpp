#include <bits/stdc++.h>
using namespace std;

int main()
{
    int test;
    cin>>test;

    while(test--)
    {
        int N;
        cin>>N;


        vector<int> A(N);
        for(auto &e: A)
        {
            cin>>e;
        }

        long long int ans = 0;

        multiset<int> sp;
        sp.insert(1);
        vector<int> bit(32, -1);

        for(int i=0; i<N; i++) /// looping all the values
        {
            for(int b=0; b<30; b++) /// for each value check which bits are on 
            {
                if(((1<<b)&A[i]) > 0)
                {
                    if(bit[b] != -1)  /// if some value is already stored then erase it from sp 
                    {
                        sp.erase(sp.find(-bit[b]));
                    }   
                    bit[b] = i;
                    sp.insert(-i);
                }
            }
            cout << i << " : ";
            for(auto x : sp) cout << x << " ";
            cout << endl;

            int val = A[i];
            int last = i;

            for(auto j: sp)
            {
                j *= -1;
                if(__builtin_popcount(val)%2 == 1)
                    ans += (last - j);

                if(j >= 0)
                {
                    last = j;
                    val |= A[j];
                }
            }
            cout << "ans :  " << ans << endl;
        }

        cout<<ans<<"\n";
    }

}