    #include <bits/stdc++.h>
    using namespace std;

    int main()
    {
        int n;
        cin >> n;

        int cs1 = 0, cs2 = 0;
        int max_lead = 0;
        int leader = 1;
        while(n--)
        {
            int p1, p2;
            cin >> p1 >> p2;

            cs1 += p1;
            cs2 += p2;
            int cur_lead = 0;
            int cur_leader = 0;
            if(cs1 >= cs2)
            {
                cur_leader = 1;
                cur_lead = cs1-cs2;
            }
            else
            {
                cur_leader = 2;
                cur_lead = cs2 - cs1;
            }
            if(cur_lead > max_lead)
            {
                max_lead = cur_lead;
                leader = cur_leader;
            }
        }
        cout << leader << " " << max_lead << "\n";
    }
